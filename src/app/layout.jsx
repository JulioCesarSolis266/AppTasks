
export const metadata = {
    title: 'Next.js',
    description: 'Generated by Next.js',
  }

  import {global} from './global.css'
  
  export default function RootLayout({ children }) {
   return (
      <html lang="en">
        <head>
          <meta charSet="utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1" />
        </head>
        <body className='bg-gray-200'>{children}</body>
      </html>
    )
  }