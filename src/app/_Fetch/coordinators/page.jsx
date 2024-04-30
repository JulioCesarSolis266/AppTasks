


export default async function FetchCoordinators() {
    const res = await fetch('http://localhost:8000/api/V1/coordinators', {
      headers: {
        authorization: process.env.API_KEY,
        },
    })
    if (!res.ok) {
        throw new Error('Failed to fetch Coordinators data');
      }
      const data = await res.json(); // Convertir la respuesta a JSON
      return data;
    }