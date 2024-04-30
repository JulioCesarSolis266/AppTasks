


export const RenderTasks = ({data}) =>{

    const handleTaskDetail = () => {
    
    }
    return (
       
        <tr className="bg-white hover:bg-slate-100 text-center text-sm">
            <td className="py-3 whitespace-nowrap">{data.incident_id}</td>
            <td className="py-3 whitespace-nowrap">{data.coordinator.branch.company.name}</td>
            <td className="py-3 whitespace-nowrap">{data.coordinator.branch.name}</td>
            <td className="py-3 whitespace-nowrap">{data.coordinator.name} {data.coordinator.surname}</td>
            <td className="py-3 whitespace-nowrap">{data.title}</td>
            <td className="py-3 whitespace-nowrap">{data.employee.user.name} {data.employee.user.surname}</td>
            <td className="py-3 whitespace-nowrap">{data.priority.task_priority}</td>
            <td className="py-3 whitespace-nowrap">{data.status.status}</td>
            <td className="py-3 whitespace-nowrap">{data.visit_date}</td>
            <td className="py-3 whitespace-nowrap"></td>
        </tr>
        
    );
}