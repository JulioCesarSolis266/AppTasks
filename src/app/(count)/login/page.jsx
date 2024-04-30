"use client";

import { useState, useEffect } from "react";
// import { SignUp } from "./SignUp";
import axios from "axios";
import { BossDashboard } from "@/app/(boss)/bossDashboard/page";
import { EmployeeDashboard } from "../../(employee)/employeeDashboard/page";
import {useRouter} from "next/navigation";

export default function Login() {
    const [email, setEmail] = useState('jp@jp.com')
    const [password, setPassword] = useState('123456')
    const [loggedIn, setLoggedIn] = useState(false)
    const [userId, setUserId] = useState(null)
    const [userName, setUserName] = useState(null)
    const [role, setRole] = useState(null)
    // const [isSignUp, setIsSignUp] = useState(false);
    
    const router = useRouter();

    const handleLogin = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post('http://localhost:8000/api/V1/login', {
                email,
                password,
                loggedIn
            });
            // console.log(response);
            setLoggedIn(true);
            setUserId(response.data.data.id);
            setUserName(response.data.data.name);
            setRole(response.data.data.role_id);
            
        } catch (error) {
            console.error('RATA: '+ error);

        }
    }

    // const handleSignUp = () => {
    //     setIsSignUp(true);
    // }

    useEffect(() => {
        if (loggedIn) {
            if (role === 1) {
                router.push('/bossDashboard');
            } else if (role === 2) {
                router.push('/employeeDashboard');
            } else {
                console.error('Usuario no identificado');
            }
        }
    }, [loggedIn, role, router]);

    
        return (
            <div className="min-h-screen flex items-center justify-center bg-gray-300 py-12 px-4 sm:px-6 lg:px-8 b">
                <div className="max-w-md w-full space-y-8">
                    <h2 className="text-center text-7xl font-bold text-gray-500 p-9 mb-5 ">Login</h2>
                    <form className="login-form" onSubmit={handleLogin}>
                        <div className="text-center">
                            <input
                                type="email"
                                id="email"
                                placeholder="Email"
                                value={email}
                                onChange={(e) => setEmail(e.target.value)}
                                className="rounded-xl border bg-gray-100 border-gray-300 px-4 py-2 mb-4"
                            />
                        </div>
                        <div className="text-center">
                            <input
                                type="password"
                                id="password"
                                placeholder="Password"
                                value={password}
                                onChange={(e) => setPassword(e.target.value)}
                                className="rounded-xl border bg-gray-100 border-gray-300 px-4 py-2 mb-4"
                            />
                        </div>
                        <div className="text-center">
                            <button type="submit" className="mt-5 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Login
                            </button>
                        </div>
                    </form>
                    <p className="text-center">Don&apos;t have an account? Sign up</p>
                </div>
            </div>
        );
}
