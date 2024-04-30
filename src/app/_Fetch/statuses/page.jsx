export default async function FetchStatuses() {
    const res = await fetch('http://localhost:8000/api/V1/statuses', {
      headers: {
        authorization: process.env.API_KEY,
        },
    })
    if (!res.ok) {
        throw new Error('Failed to fetch Statuses data');
      }
      const data = await res.json(); // Convertir la respuesta a JSON
      return data;
    }