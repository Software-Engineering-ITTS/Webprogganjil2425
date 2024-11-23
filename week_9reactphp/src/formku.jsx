import React, { useState, useEffect } from "react";

const Pemantauanproyek = () => {
  const [formData, setFormData] = useState({
    projectnama: "",
    password: "",
    status: "",
    Jenis: [],
    deskripsi: "",
    tingkatnnya: "low",
    startDate: "",
    endDate: "",
    budget: "",
    progress: 0,
  });

  const [notification, setNotification] = useState(null);
  const [changeHistory, setChangeHistory] = useState([]);

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;

    if (type === "checkbox") {
      setFormData((prevData) => ({
        ...prevData,
        Jenis: checked
          ? [...prevData.Jenis, value]
          : prevData.Jenis.filter((feature) => feature !== value),
      }));
    } else {
      setFormData((prevData) => ({
        ...prevData,
        [name]: value,
      }));
    }

    setChangeHistory((prevHistory) => [
      ...prevHistory,
      { field: name, value, timestamp: new Date().toLocaleString() },
    ]);
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    setNotification("Proyek telah disimpan.");
    setTimeout(() => setNotification(null), 3000);

    console.log("Data proyek:", formData);
  };

  useEffect(() => {
    if (changeHistory.length > 0) {
      setNotification(
        `Data proyek diubah: ${changeHistory[changeHistory.length - 1].field}`
      );
      setTimeout(() => setNotification(null), 2000);
    }
  }, [formData]);

  const styles = {
    container: {
      backgroundColor:"green",
      maxWidth: "600px",
      margin: "auto",
      padding: "20px",
      fontFamily: "Arial, sans-serif",
    },
    header: {
      backgroundColor:"red",
      textAlign: "center",
      color: "#333",
    },
    formGroup: {
      marginBottom: "15px",
    },
    label: {
      display: "block",
      fontWeight: "bold",
      marginBottom: "5px",
    },
    input: {
      width: "100%",
      padding: "8px",
      borderRadius: "4px",
      border: "1px solid #ccc",
      fontSize: "16px",
    },
    textarea: {
      width: "100%",
      padding: "8px",
      borderRadius: "4px",
      border: "1px solid #ccc",
      fontSize: "16px",
    },
    select: {
      width: "100%",
      padding: "8px",
      borderRadius: "4px",
      border: "1px solid #ccc",
      fontSize: "16px",
    },
    button: {
      width: "100%",
      padding: "10px",
      backgroundColor: "#007bff",
      color: "white",
      border: "none",
      borderRadius: "4px",
      cursor: "pointer",
      fontSize: "16px",
    },
    notification: {
      backgroundColor: "#28a745",
      color: "white",
      padding: "10px",
      borderRadius: "4px",
      textAlign: "center",
      marginBottom: "15px",
    },
    changeHistory: {
      marginTop: "20px",
      fontSize: "14px",
    },
    historyList: {
      listStyleType: "none",
      padding: "0",
    },
    historyItem: {
      padding: "5px 0",
      borderBottom: "1px solid #ddd",
    },
  };

  return (
    <div style={styles.container}>
      <h1 style={styles.header}>Pemantauan Proyek</h1>

      {notification && <div style={styles.notification}>{notification}</div>}

      <form onSubmit={handleSubmit}>
        <div style={styles.formGroup}>
          <label htmlFor="project-name" style={styles.label}>
            Nama Proyek:
          </label>
          <input
            type="text"
            id="project-name"
            name="projectnama"
            value={formData.projectnama}
            onChange={handleChange}
            placeholder="Masukkan nama proyek"
            style={styles.input}
          />
        </div>

        <div style={styles.formGroup}>
          <label htmlFor="password" style={styles.label}>
            Kata Sandi:
          </label>
          <input
            type="password"
            id="password"
            name="password"
            value={formData.password}
            onChange={handleChange}
            placeholder="Masukkan kata sandi"
            style={styles.input}
          />
        </div>

        <div style={styles.formGroup}>
          <label style={styles.label}>Status Proyek:</label>
          <input
            type="radio"
            id="ongoing"
            name="status"
            value="Ongoing"
            checked={formData.status === "Ongoing"}
            onChange={handleChange}
          />
          <label htmlFor="ongoing">Sedang Berjalan</label>
          <input
            type="radio"
            id="completed"
            name="status"
            value="Completed"
            checked={formData.status === "Completed"}
            onChange={handleChange}
          />
          <label htmlFor="completed">Selesai</label>
        </div>

        <div style={styles.formGroup}>
          <label style={styles.label}>Fitur Tambahan:</label>
          <input
            type="checkbox"
            id="feature1"
            name="Jenis"
            value="Report"
            checked={formData.Jenis.includes("Report")}
            onChange={handleChange}
          />
          <label htmlFor="feature1">Laporan Harian</label>
          <input
            type="checkbox"
            id="feature2"
            name="Jenis"
            value="Notification"
            checked={formData.Jenis.includes("Notification")}
            onChange={handleChange}
          />
          <label htmlFor="feature2">Notifikasi Otomatis</label>
          <input
            type="checkbox"
            id="feature3"
            name="Jenis"
            value="Tracking"
            checked={formData.Jenis.includes("Tracking")}
            onChange={handleChange}
          />
          <label htmlFor="feature3">Pelacakan</label>
        </div>

        <div style={styles.formGroup}>
          <label htmlFor="deskripsi" style={styles.label}>
            Deskripsi Proyek:
          </label>
          <textarea
            id="deskripsi"
            name="deskripsi"
            rows="4"
            value={formData.deskripsi}
            onChange={handleChange}
            placeholder="Deskripsikan proyek di sini"
            style={styles.textarea}
          />
        </div>

        <div style={styles.formGroup}>
          <label htmlFor="tingkatnnya" style={styles.label}>
            Prioritas Proyek:
          </label>
          <select
            id="tingkatnnya"
            name="tingkatnnya"
            value={formData.tingkatnnya}
            onChange={handleChange}
            style={styles.select}
          >
            <option value="low">Rendah</option>
            <option value="medium">Sedang</option>
            <option value="high">Tinggi</option>
          </select>
        </div>

        <div style={styles.formGroup}>
          <label htmlFor="startDate" style={styles.label}>
            Tanggal Mulai:
          </label>
          <input
            type="date"
            id="startDate"
            name="startDate"
            value={formData.startDate}
            onChange={handleChange}
            style={styles.input}
          />
        </div>

        <div style={styles.formGroup}>
          <label htmlFor="endDate" style={styles.label}>
            Tanggal Selesai:
          </label>
          <input
            type="date"
            id="endDate"
            name="endDate"
            value={formData.endDate}
            onChange={handleChange}
            style={styles.input}
          />
        </div>

        <div style={styles.formGroup}>
          <label htmlFor="budget" style={styles.label}>
            Anggaran:
          </label>
          <input
            type="number"
            id="budget"
            name="budget"
            value={formData.budget}
            onChange={handleChange}
            placeholder="Masukkan anggaran"
            style={styles.input}
          />
        </div>

        <div style={styles.formGroup}>
          <label htmlFor="progress" style={styles.label}>
            Persentase Penyelesaian:
          </label>
          <input
            type="range"
            id="progress"
            name="progress"
            value={formData.progress}
            onChange={handleChange}
            min="0"
            max="100"
            style={styles.input}
          />
          <span>{formData.progress}%</span>
        </div>

        <div style={styles.formGroup}>
          <button type="submit" style={styles.button}>
            Simpan Proyek
          </button>
        </div>
      </form>

      <div style={styles.changeHistory}>
        <h2>Riwayat Perubahan:</h2>
        <ul style={styles.historyList}>
          {changeHistory.map((change, index) => (
            <li key={index} style={styles.historyItem}>
              {change.timestamp} - {change.field} diubah menjadi "{change.value}"
            </li>
          ))}
        </ul>
      </div>
    </div>
  );
};

export default Pemantauanproyek;
