'use server';

import { ID } from "node-appwrite";
import { createAdminClient, createSessionClient } from "../appwrite";
import { cookies } from "next/headers";
import { parseStringify } from "../utils";
import { redirect } from "next/navigation";

export const signIn = async ({ email, password }: signInProps) => {
    try {
        const { account } = await createAdminClient();
        const session = await account.createEmailPasswordSession(email, password);
        
        // Store session in cookies
        cookies().set("appwrite-session", session.secret, {
            path: "/",
            httpOnly: true,
            sameSite: "strict",
            secure: true,
        });

        return parseStringify(session);
    } catch (error) {
        console.log('Error', error);
    }
}

export const signUp = async (userData: SignUpParams) => {

    // destructuring the data
    const { email, password, firstName, lastName } = userData;

    try {
        const { account } = await createAdminClient();

        // fetch destructured data
        const newUserAccount = await account.create(
            ID.unique(),
            email,
            password,
            `${firstName} ${lastName}`
        );

        // create session for the user by awaiting account that create email and password session by passing the email and password
        const session = await account.createEmailPasswordSession(email, password);

        // import cookies from next/headers
        cookies().set("appwrite-session", session.secret, {
            path: "/",
            httpOnly: true,
            sameSite: "strict",
            secure: true,
        });

        return parseStringify(newUserAccount);

    } catch (error) {
        console.log('Error', error);

    }
}

export async function getLoggedInUser() {
    try {
        const { account } = await createSessionClient();
        const user = await account.get();
        console.log(user);
        
        return parseStringify(user);
    } catch (error) {
        return error;
    }
}

export const logoutAccount = async () => {
    try {
        const { account } = await createSessionClient();
        cookies().delete('appwrite-session');
        await account.deleteSession('current');
    } catch (error) {
        console.log('Error', error);
        return null;
    }
}
