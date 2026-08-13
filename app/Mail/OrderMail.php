<?php

namespace App\Mail;

use Endroid\QrCode\QrCode as EndroidQrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public $email,
        public $order
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $appName = config('app.name');

        return new Envelope(
            subject: $appName.' new order place successfully',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.order',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $order = $this->order;

        $qrCode = new EndroidQrCode('#'.$order->prefix.$order->order_code);
        $qrCode->setSize(100);
        $qrCodeImage = (new PngWriter)->write($qrCode)->getDataUri();

        $defaultConfig = (new ConfigVariables)->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables)->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $fontData['kalpurush'] = [
            'R' => 'kalpurush.ttf',
        ];

        $mPdf = new Mpdf([
            'mode' => 'UTF-8',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'tempDir' => storage_path('app/public/mpdf_tmp'),
            'fontDir' => array_merge($fontDirs, [public_path('fonts')]),
            'fontdata' => $fontData,
            'format' => 'A4',
        ]);

        $mPdf->WriteHTML(view('PDF.invoice', compact('order', 'qrCodeImage'))->render());

        $fileName = 'invoice-'.$order->prefix.$order->order_code.'.pdf';

        return [
            Attachment::fromData(fn () => $mPdf->Output($fileName, 'S'), $fileName)
                ->withMime('application/pdf'),
        ];
    }
}
