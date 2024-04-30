import FetchCoordinators from '@/app/_Fetch/coordinators/page';
import { useState, useEffect } from 'react';

export default function CoordinatorsBotton({onCoordinatorChange}) {
    const [coordinators, setCoordinators] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [coordinatorId, setCoordinatorId] = useState('');

    useEffect(() => {
        const fetchCoordinators = async () => {
            try {
                const info = await FetchCoordinators();
                if (Array.isArray(info)) {
                    setCoordinators(info);
                } else {
                    throw new Error('Los datos recibidos de los coordinadores no son un array');
                }
                setIsLoading(false);
            } catch (error) {
                console.error('Error al obtener los datos de los coordinadores:', error);
            }
        };

        fetchCoordinators();
    }, []);

    const handleCoordinatorChange = (e) => {
        setCoordinatorId(e.target.value);
        if (onCoordinatorChange) {
            onCoordinatorChange(e.target.value);
        }
    };

    if (isLoading) {
        return <h4 className='text-center m-10 text-indigo-200 font-bold text-4xl'>Cargando...</h4>;
    }

    // console.log('coordinators:', coordinatorId);
    
    return (
        <div>
            <h4 className="font-bold m-1">Coordinador</h4>
            <select name="coordinator" className='w-2/6 p-4' value={coordinatorId} onChange={handleCoordinatorChange}>
                <option value="">Seleccionar coordinador</option>
                {coordinators.map((coordinator) => (
                    <option key={coordinator.id} value={coordinator.id}>
                        {coordinator.name}
                    </option>
                    
                ))}
            </select>
            
        </div>
    );
}
