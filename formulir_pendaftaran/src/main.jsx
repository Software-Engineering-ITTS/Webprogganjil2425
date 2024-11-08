import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import FieldInput from './components/FieldInput.jsx'

createRoot(document.getElementById('root')).render(
  
  <StrictMode>
    <FieldInput />
    {/* <App /> */}
  </StrictMode>,
)
