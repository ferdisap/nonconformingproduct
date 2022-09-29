import {
  Chart,
  ArcElement,
  LineElement,
  BarElement,
  PointElement,
  BarController,
  BubbleController,
  DoughnutController,
  LineController,
  PieController,
  PolarAreaController,
  RadarController,
  ScatterController,
  CategoryScale,
  LinearScale,
  LogarithmicScale,
  RadialLinearScale,
  TimeScale,
  TimeSeriesScale,
  Decimation,
  Filler,
  Legend,
  Title,
  Tooltip,
  SubTitle
} from 'chart.js';

Chart.register(
  ArcElement,
  LineElement,
  BarElement,
  PointElement,
  BarController,
  BubbleController,
  DoughnutController,
  LineController,
  PieController,
  PolarAreaController,
  RadarController,
  ScatterController,
  CategoryScale,
  LinearScale,
  LogarithmicScale,
  RadialLinearScale,
  TimeScale,
  TimeSeriesScale,
  Decimation,
  Filler,
  Legend,
  Title,
  Tooltip,
  SubTitle
);

export class DashboardChart {
  // labels;
  labels = [
    'J',
    'F',
    'M',
    'A',
    'M',
    'Jn',
    'Jl',
    'Ag',
    'Sp',
    'Oc',
    'Nv',
    'Ds',
  ];

  // data;
  data = {
    labels: this.labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45, 30, 20, 45, 90, 130],
    }]
  };

  config = {
    type: 'line',
    data: this.data,
    options: {}
  };

  /**
   * this function is used to set target canvas for the chart.
   * this function is void
   * @param {elemetId} - is the id of the canvas
   * @param {[1]} - is the component name of the canvas established. If no component, it means the canvas is not in shadowRoot 
   */
  setCtx (elementId) {
      let componentName = arguments[1]
      try {
          this.ctx = document
              .querySelector('#content')
              .querySelector(componentName)
              .shadowRoot.getElementById(elementId)
              .getContext('2d')
      } catch (e) {
          try {
              this.ctx = document.getElementById(elementId).getContext('2d')
          } catch (e) {
              console.log(e, elementId, 'the element id cannot be found')
          }
      }
  }

  /**
   * this function is used to set the labels, for X label
   * this function is void
   * @param {labels} : array 
   */
  setLabel (labels = []) {
      labels.length == 0 ? this.labels : (this.labels = Array.from(labels))
  }

  /**
   * this function is to set data to be shown in chart. You should call the setLabel() before call this function
   * @param {*} :string, for the tittle of the chart
   * @param {*} :array, for the data to be shown
   */
  setData ( title = 'no title given' ,data = []) {
      // return data.length == 0 ? this.data : () => {}
      this.data = {
          labels: this.labels,
          datasets: [
              {
                  label: title,
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'rgb(255, 99, 132)',
                  data: data
              }
          ]
      };
      // return this.labels;
  }


  // set config bisa digunakan untuk mengganti type chart, dan option2 chart lainnya
  /**
   * this function is set "config" properties of this class. You should call the setLabel(), setData(), and then this function serialized
   */
  setConfig () {
      this.config = {
          type: 'line',
          data: this.data,
          options: {}
      }
  }

  /**
   * @param {(arg0: any) => void} componentName
   * @param {componentName}  - must be a type of string of the custom component in window
   */
  get prepared () {
      this.setConfig();
      return this.config;
  }

  /**
   * @param {(arg0: any) => void} componentName
   * @param {componentName}  - must be a type of string of the custom component in window
   */
  get renderChart () {
      try {
          return (this.chart = new Chart(this.ctx, this.prepared))
      } catch (e) {
          this.chart.destroy()
          return (this.chart = new Chart(this.ctx, this.prepared))
      }
  }

  /**
   * this function for delete the chart. But the variable instance of this class still available to re-build the chart or modify the data
   */
  get destroyChart () {
      return this.chart.destroy()
  }
}

