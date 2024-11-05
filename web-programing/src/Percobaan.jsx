import { useState } from "react";
import ".styleMe.css";

function App() {
  const [form, setForm] = useState({ username: "", password: " " });
  const [errors, setError] = useState({});
  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({
      ...form,
      [name]: value,
    });
  };

  const onSubmit = (e) => {
    e.prevenDefault();
    const errors = validateForm(form);
    setError(errors);
    if (Object.keys(errors).length === 0) {
      // Submit the form
      console.log("Form submitted successfully!");
    }
  };
}

export default App;
