import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import { BrowserRouter, Routes, Route } from 'react-router'
import './index.css'
import { Main } from './pages/landing/Main.tsx'
import Login from './pages/auth/sign-in/login.tsx'
import Register from './pages/auth/sign-up/register.tsx'
import DashboardStudent from './pages/student/dashboard/dashboard.tsx'
import DashboardAdmin from './pages/admin/dashboard/dashboard.tsx'
import JurusanAdmin from './pages/admin/dashboard/jurusan.tsx'
import DataPeserta from './pages/admin/dashboard/peserta.tsx'
import FormAddJurusan from './pages/admin/dashboard/formaddjurusan.tsx'
import Announcement from './pages/student/dashboard/announcement.tsx'
import { Provider } from 'react-redux'
import store from './store/store.ts'
import FormUpdateJurusan from './pages/admin/dashboard/formupdatejurusan.tsx'
import FormUpdateJurusanWrapper from './pages/wrapper/formupdatejurusanwrapper.tsx'
import Profile from './pages/student/dashboard/profile.tsx'

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <Provider store={store}>
    <BrowserRouter>
      <Routes>
        <Route path='/'>
          <Route index element={<Main />} />
          <Route path='/login' element={<Login />} />
          <Route path='/register/student' element={<Register />} />
          <Route path='/student/dashboard/:id' element={<DashboardStudent />} />
          <Route path='/student/dashboard/:id/announcement' element={<Announcement />} />
          <Route path='/student/dashboard/:id/profile' element={<Profile />} />
          <Route path='/admin/dashboard' element={<DashboardAdmin />} />
          <Route path='/admin/dashboard/jurusan' element={<JurusanAdmin />} />
          <Route path='/admin/dashboard/datapeserta' element={<DataPeserta />} />
          <Route path='/admin/dashboard/addjurusan' element={<FormAddJurusan />} />
          <Route path='/admin/dashboard/updatejurusan/:jurusan' element={<FormUpdateJurusanWrapper />} />
        </Route>
      </Routes>
    </BrowserRouter>
    </Provider>
  </StrictMode>,
)
