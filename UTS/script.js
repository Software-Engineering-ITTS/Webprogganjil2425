const btnShowHideSkill = document.getElementById("btnShowHideSkill");
const iconSkill = document.querySelectorAll(".icon-skill");
const btnShowHideApps = document.getElementById('btnShowHideApps');
const appsUsed = document.querySelectorAll('.apps-used');

btnShowHideSkill.addEventListener("click", () => {
    iconSkill.forEach(skill => skill.style.display = "block");
    appsUsed.forEach(app => app.style.display = "none");
  });

  btnShowHideApps.addEventListener("click", () => {
    appsUsed.forEach(app => app.style.display = "block");
    iconSkill.forEach(skill => skill.style.display = "none");
  });