
"use client";

import fetchTasksData from "@/app/_Fetch/tasks/page";
import { useEffect, useState } from "react";
import { RenderTasks } from "@/components/RenderTasks/page";
import { Header } from "@/components/Header/page";



export default function BossDashboard  ({ userId, userName }) {
    const [tasks, setTasks] = useState([]);
    const [isLoading, setIsLoading] = useState(true);//Para que cuando renderice la pagina muestre un mensaje de cargando mientras se obtienen los datos.


    useEffect(() => {
        const fetchTasks = async () => {
            try {
                const info = await fetchTasksData();//Nombre del archivo que contiene la funcion que hace la peticion a la API
                if (Array.isArray(info)) {//Esto hace que si el dato que se recibe no es un array, se muestre un error en la consola
                    setTasks(info);

                } else {
                    throw new Error('Los datos recibidos no son un array');
                }
                setIsLoading(false);
            } catch (error) {
                console.error('Error al obtener los datos:', error);
            }
        };

        fetchTasks();
    }, []);

    if (isLoading) {
        return <h4 className='text-center m-10 text-gray-200 font-bold text-4xl'>Cargando...</h4>;
    }
    
    return (
        <div className="w-full">
            <Header />
            {/* <div className="max-w-screen-lg"> */}
            <div className="overflow-x-hidden">
            <table className="w-full bg-gray-300">
                    <thead className='bg-gray-300'>
                        <tr className="bg-gray-600">
                            <th className="px-2 py-3 text-center text-sm font-medium text-white uppercase">Id Incidente</th>
                            <th className="px-2 py-3 text-center text-sm font-medium text-white uppercase">Empresa</th>
                            <th className="px-2 py-3 text-center text-sm font-medium text-white uppercase">Sucursal</th>
                            <th className="px-2 py-3 text-center text-sm font-medium text-white uppercase">Coordinador</th>
                            <th className="px-2 py-3 text-center text-sm font-medium text-white uppercase">Titulo</th>
                            <th className="px-2 py-3 text-center text-sm font-medium text-white uppercase">Trabajador</th>
                            <th className="px-2 py-3 text-center text-sm font-medium text-white uppercase">Prioridad</th>
                            <th className="px-2 py-3 text-center text-sm font-medium text-white uppercase">Estado</th>
                            <th className="px-2 py-3 text-center text-sm font-medium text-white uppercase">Fecha de Visita</th>
                            <th className="px-2 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        {tasks.map((data) => (
                            <RenderTasks key={data.id} data={data} />
                            
                        ))}
                    </tbody>
                </table>
                </div>
        </div>
    );
    }

