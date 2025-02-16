"use server";
import { Client, Account, Databases, Users } from "node-appwrite";
import { cookies } from "next/headers";


// Below 2 server actions

// Fetch sessions (allow both regular users and admin)
export async function createSessionClient() {
    const client = new Client()
        .setEndpoint(process.env.NEXT_PUBLIC_APPWRITE_ENDPOINT!)
        .setProject(process.env.NEXT_PUBLIC_APPWRITE_PROJECT!);        

    const session = cookies().get("appwrite-session"); // No need for await
    if (!session || !session.value) {
        // console.warn("No session cookie found");
        // return null;
        throw new Error("No session cookie found");
    }

    // console.log("Session Cookie Found:", session.value); // Debugging

    client.setSession(session.value);

    return {
        get account() {
            return new Account(client);
        },
    };
}

// Allows API to do whatever you want (only admin)
export async function createAdminClient() {
    const client = new Client()
        .setEndpoint(process.env.NEXT_PUBLIC_APPWRITE_ENDPOINT!)
        .setProject(process.env.NEXT_PUBLIC_APPWRITE_PROJECT!)
        .setKey(process.env.NEXT_APPWRITE_KEY!);

    return {
        get account() {
            return new Account(client);
        },
        get database() {
            return new Databases(client);
        },
        get user() {
            return new Users(client);
        }
    };
}
