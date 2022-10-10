class Car {
    constructor(gas, num) {
        this.gas = gas;
        this.num = num;
    }
    getNumGas() {
        console.log(`ガソリンは${this.gas}です。ナンバーは${this.num}です`);
    }
}

let car = new Car(20.4, 1234);
car.getNumGas();
