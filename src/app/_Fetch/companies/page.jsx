

export default async function FetchCompanies() {
  const res = await fetch('http://localhost:8000/api/V1/companies', {
    headers: {
      authorization: process.env.API_KEY,
      },
  })
  if (!res.ok) {
      throw new Error('Failed to fetch Companies data');
    }
    const data = await res.json(); // Convertir la respuesta a JSON
    return data;
  }