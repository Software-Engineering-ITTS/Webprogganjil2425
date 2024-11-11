import { useState } from "react"
import reactLogo from 'assets/react.svg'
import viteLogo from 'vite.svg'

function App() {
    const [form, setForm] = useState({username: "", password: ""});
    const [errors, setError] = useState({});

    const HandleChange = (e) => (
        const [name, value] = e.target
        setForm(
            ...form, [name] : value
        )
        // const name = e.target.name
        // const value = e.target.value
    )

    const OnSubmit = (e) => (
        e.preventDefault();
        const errors = validateForm(form);
        setError(errors);
        if(Object.keys(errors).length === 0){
            console.log("call api post")
        }
    )

    const validateForm = (form) => (
        const errors = {};
        if (!form.username.trim()) {
            errors.username = "username is required"
        }
        if (!form.password.trim()) {
            errors.password = "password is required"
        } else if (form.password.length < 8) {
            errors.password = "password minimal 8 karakter"
        }
        return errors;
    )

    return (
        <>
        <form onSubmit={OnSubmit}>
            <div style={{display: "flex", flexDirection: "column", width: "400px"}}>
                <div style={{display: "flex", flexDirection: "column"}}>
                    <label htmlFor="">username</label>
                    <input type="text" name="username" id="username" onChange={handleChange}/>
                    <span>{errors.username}</span>
                </div>
                <div style={{display: "flex", flexDirection: "column"}}>
                    <label htmlFor="">password</label>
                    <input type="text" name="password" id="password" onChange={handleChange}/>
                    <span>{errors.password}</span>
                </div>
                <button type="submit" style={{marginTop: "16px"}}>Login</button>
            </div>
        </form>
        </>
    )
}

export default App