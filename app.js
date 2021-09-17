const ctx = document.getElementById("myChart").getContext("2d");

const DATA_COUNT = 5;
/* я тут типо изменил что-то */
const DATA_COUNT2 = 52;
/* я тут типо изменил что-то */

/* я тут типо еще что-то изменил */
const DATA_COUNT23 = 523;
/* я тут типо еще что-то изменил */

const NUMBER_CFG = { count: DATA_COUNT, min: 0, max: 100 };

const data = {
  labels: ["Facebook", "GitHub", "Google"],
  datasets: [
    {
      label: "Dataset 1",
      data: [1.84, 0.41, 4.25],
      backgroundColor: [
        "rgb(255, 99, 132)",
        "rgb(54, 162, 235)",
        "rgb(255, 205, 86)",
      ],
    },
  ],
};

const config = {
  type: "pie",
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
      title: {
        display: true,
        text: "Количество пользователей - млрд",
      },
    },
  },
};

new Chart(ctx, config);


