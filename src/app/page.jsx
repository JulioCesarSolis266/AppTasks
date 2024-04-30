
export default function Home() {
    return (
        <div className="text-center">
            <h1 className="text-center text-white bg-black text-9xl font-bold p-9 mb-5">Task Manager</h1>
            <p className="m-20">
                <a href="login" className="w-1/4 text-4xl p-3 inline-block text-center border-2 rounded-2xl bg-green-700 hover:bg-green-500 hover:text-4xl">Login</a>
            </p>
            <p className="m-20">
                <a href="register" className="w-1/4 text-4xl p-3 inline-block text-center border-2 rounded-2xl bg-green-700 hover:bg-green-500 hover:text-4xl">Sing Up</a>
            </p>
        </div>
    );
}