import FetchPriorities from '@/app/_Fetch/priorities/page';
import { useState, useEffect } from 'react';

export default function PrioritiesBotton({ onPriorityChange }) {
    const [priorities, setPriorities] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [priorityId, setPriorityId] = useState('');

    useEffect(() => {
        const fetchPriorities = async () => {
            try {
                const info = await FetchPriorities();
                if (Array.isArray(info.data)) {
                    setPriorities(info.data);
                } else {
                    throw new Error('Los datos recibidos de las prioridades no son un array');
                }
                setIsLoading(false);
            } catch (error) {
                console.error('Error al obtener los datos de las prioridades:', error);
            }
        };

        fetchPriorities();
    }, []);

    const handlePriorityChange = (e) => {
        const selectedPriorityId = e.target.value;
        setPriorityId(selectedPriorityId);
        if (onPriorityChange) {
            onPriorityChange(selectedPriorityId);
        }
    };

    if (isLoading) {
        return <h4 className='text-center m-10 text-indigo-200 font-bold text-4xl'>Cargando...</h4>;
    }

    return (
        <div>
            <h4 className="font-bold m-1">Prioridad</h4>
            <select name="priority" className='w-2/6 p-4' value={priorityId} onChange={handlePriorityChange}>
                <option value="">Seleccionar prioridad</option>
                {priorities.map((priority) => (
                    <option key={priority.id} value={priority.id}>
                        {priority.task_priority}
                    </option>
                ))}
            </select>
        </div>
    );
}
