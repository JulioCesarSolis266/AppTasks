


export default async function FetchEmployees() {
    const res = await fetch('http://localhost:8000/api/V1/employees', {
      headers: {
        authorization: process.env.API_KEY,
        },
    })
    if (!res.ok) {
        throw new Error('Failed to fetch Employees data');
      }
      const data = await res.json(); // Convertir la respuesta a JSON
      return data;
    }