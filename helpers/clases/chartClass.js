export default class ChartClass {
    constructor() {
        this.axis = new Axis();
        this.data = [{
            label: '',
            value: ''
        }];
        this.province = '';
        this.title = '';

        // this.dataDefault();
    }

    dataDefault() {

        this.title = 'Título de ejemplo'
        this.axis.x = 'label'
        this.axis.y = 'value'
        this.data = [
            {
            "label": "Valor 1",
            "value": 501.9
            }, {
            "label": "Valor 2",
            "value": 301.9
            }, {
            "label": "Valor 3",
            "value": 201.1
            }, {
            "label": "Valor 4",
            "value": 165.8
            }, {
            "label": "Valor 5",
            "value": 139.9
            }, {
            "label": "Valor 6",
            "value": 128.3
            }, {
            "label": "Valor 7",
            "value": 99
            }, {
            "label": "Valor 8",
            "value": 60
            }, {
            "label": "Valor 9",
            "value": 50
            }
        ]
    }
}

class Axis {
    constructor() {
        this.x = ''
        this.y = ''
    }
}