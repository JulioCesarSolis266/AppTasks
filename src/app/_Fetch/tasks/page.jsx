



export default async function FetchTasksData() {
    const res = await fetch('http://localhost:8000/api/V1/tasks', {
      headers: {
        authorization: process.env.API_KEY,//Esto es para que el servidor sepa que es un usuario autorizado
      },
      
    })
    if (!res.ok) {
        throw new Error('Failed to fetch Tasks data');
      }
      const data = await res.json(); // Convertir la respuesta a JSON

      // console.log(data)

      return data;

    }


