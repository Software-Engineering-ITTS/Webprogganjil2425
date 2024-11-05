
// import reactLogo from './assets/react.svg'
// import viteLogo from '/vite.svg'

import { useState } from "react"

function App() {
    const [form, setForm] = useState({ username: "", password: "" });
    const [errors, setError] = useState({})

    const handleChange = (e) => {
        const { name, value } = e.target
        setForm({
            ...form,
            [name]: value
        });

    }
    const OnSubmit = (e) => {
        e.preventDefault();
        const errors = validateForm(form);
        setError(errors)

        if(Object.keys(errors).length === 0){
            console.log("Call API POST")
        }
    }

    const validateForm = (form) => {
        const errors = {};

        if (!form.username.trim()) {
            errors.username = "required"
        }
        if (!form.password) {
            errors.password = "required"
        } else if( form.password.length < 8){
            errors.password = "minimal password 8 karakter"
        }

        return errors
    }
    return (
        <>
            <form onSubmit={OnSubmit}>
                <div style={{ display: "flex", flexDirection: "column", width: "400px" }}>
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor="" >Username</label>
                        <input type="text" name="username" id="username" onChange={handleChange} />
                        <span style={{ color: "red" }}>{errors.username}</span>
                    </div>
                    <br />
                    <div style={{ display: "flex", flexDirection: "column" }}>
                        <label htmlFor=""> Password </label>
                        <input type="password" name="password" id="password" onChange={handleChange} />
                        <span style={{ color: "red" }}>{errors.password}</span>
                    </div>
                    <button type="submit" style={{ marginTop: "16px" }}>Login</button>
                </div>
            </form>

        </>
    )


}

export default App