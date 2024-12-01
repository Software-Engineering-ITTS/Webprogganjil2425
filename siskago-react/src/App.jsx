import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import FormulirAnggotaBaru from './components/FormulirAggotaBaru';
import DaftarAnggota from './components/DaftarAnggota';
import Home from './components/Home';

function App() {
  return (
    <Router>
      <Routes>
        <Route path='/' element={<Home/>}/>
        <Route path='/FormAnggota' element={<FormulirAnggotaBaru/>}/>
        <Route path='/DaftarAnggota' element={<DaftarAnggota/>}/>
      </Routes>
    </Router>
  )
}
export default App