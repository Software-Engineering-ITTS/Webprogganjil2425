import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import App from './App.jsx'
import FieldInput from './components/FieldInput.jsx'

createRoot(document.getElementById('root')).render(
  
  <StrictMode>
    <FieldInput />
    {/* <App /> */}
  </StrictMode>,
)
