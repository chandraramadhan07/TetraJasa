// Aside Function
const hamburger = document.getElementById("hamburger");
const sidebar = document.getElementById("side-bar");
const side_p = document.querySelectorAll(".aside-p");

hamburger.addEventListener("click", () => {
  if (sidebar.classList.contains("w-[300px]")) {
    sidebar.classList.remove("w-[300px]");
    sidebar.classList.add("w-[100px]");
  } else {
    sidebar.classList.remove("w-[100px]");
    sidebar.classList.add("w-[300px]");
  }
  hamburger.classList.toggle("rotate-180");
  side_p.forEach((element) => {
    element.classList.toggle("hidden");
  });
});


// Radio input Function
function inputJaminan(show) {
  const inputJaminan = document.getElementById("input-jaminan");
  if (show) {
    inputJaminan.classList.remove("hidden");
    inputJaminan.setAttribute("name", "jenis_jaminan_lain");
  } else {
    inputJaminan.classList.add("hidden");
    inputJaminan.removeAttribute("name");
  }
}

function inputKlaim(show) {
  const inputKlaim = document.getElementById("input-klaim");
  if (show) {
    inputKlaim.classList.remove("hidden");
    inputKlaim.setAttribute("name", "waktu_klaim_lain");
  } else {
    inputKlaim.classList.add("hidden");
    inputKlaim.removeAttribute("name");
  }
}
