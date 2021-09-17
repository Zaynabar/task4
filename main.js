const checkboxAllFiltered = document.querySelector("checkBoxPickAllFiltered");
const statusSortBtn = document.querySelector(".status");
const idSortBtn = document.querySelector(".id");
const nameSortBtn = document.querySelector(".name");
const socialNetworkSortBtn = document.querySelector(".social-network");
const firsDateSortBtn = document.querySelector(".first-date");
const lastDateSortBtn = document.querySelector(".last-date");
const checkboxAll = document.querySelector(".checkBoxPickAllFiltered");
const table = document.querySelector(".table");
const tBody = document.querySelector(".tableBody");
const rows = tBody.querySelectorAll("tr");
const statuses = ["active", "blocked"];
const sortMethods = ["asc", "desc"];
let currentFilteredStatus = statuses[0];
let currentSortMethod = sortMethods[0];

statusSortBtn.onclick = function () {
  currentFilteredStatus =
    currentFilteredStatus === statuses[1] ? statuses[0] : statuses[1];

  this.setAttribute("data-sort", currentFilteredStatus);
  this.classList.toggle("active");
  disableAllInputs();
  rows.forEach((row) => {
    for (let child of row.children) {
      if (child.innerText === currentFilteredStatus) {
        row.remove();
        sortTableRender(row);
      }
    }
  });
};

checkboxAll.onclick = function () {
  if (!this.checked) {
    disableAllInputs();
  } else {
    rows.forEach((row) => {
      for (let child of row.children) {
        if (child.innerText === currentFilteredStatus) {
          const selectedInput = row.querySelector("input");
          selectedInput.checked = true;
        }
      }
    });
  }
};

idSortBtn.addEventListener("click", (e) => sortByRow(e, "userId"));
nameSortBtn.addEventListener("click", (e) => sortTable(e, 2));
lastDateSortBtn.addEventListener("click", (e) => sortTable(e, 5));
firsDateSortBtn.addEventListener("click", (e) => sortTable(e, 4));
socialNetworkSortBtn.addEventListener("click", (e) => sortTable(e, 3));

const sortByRow = (e, id) => {
  e.target.classList.toggle("active");

  const rowsForSort = table.rows;
  const sortedArray = [];
  const sortedRows = [];

  for (let row of rowsForSort) {
    if (row !== table.rows[0]) {
      sortedArray.push(row);
    }
  }

  tBody.innerText = "";
  sortedArray.forEach((row) => {
    for (let child of row.children) {
      if (child.classList.contains(id)) {
        sortedRows.push(child.innerText);
      }
    }
  });

  sortedArray.sort((a, b) => {
    for (let child of b.children) {
      if (child.classList.contains(id)) {
        for (let child2 of a.children) {
          if (child2.classList.contains(id)) {
            if (currentSortMethod === sortMethods[0]) {
              return child2.innerText - child.innerText;
            }
            return child.innerText - child2.innerText;
          }
        }
      }
    }
  });

  currentSortMethod =
    currentSortMethod === sortMethods[0] ? sortMethods[1] : sortMethods[0];

  sortedArray.forEach((sortedRow) => tBody.append(sortedRow));
};

const disableAllInputs = () => {
  checkboxAll.checked = false;
  tBody.querySelectorAll(".userCheckbox").forEach((checkbox) => {
    checkbox.checked = false;
  });
};

const sortTableRender = (element) => {
  tBody.insertAdjacentElement("afterbegin", element);
};

function sortTable(e, n) {
  var table,
    rows,
    switching,
    i,
    x,
    y,
    shouldSwitch,
    dir,
    switchcount = 0;
  table = document.getElementById("Table");
  switching = true;
  dir = "asc";
  e.target.classList.toggle("active");
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < rows.length - 1; i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];

      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
