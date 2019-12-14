import Rules from "../../forms/abstract/Rules";

export default class Model {
  constructor(storeName, id) {
    this.id = id;
    this.storeName = storeName;
  }

  static getRandomImageUrl(width = 800, height = 600) {
    let min = 100;
    let max = 1000;
    let rand = Math.floor(Math.random() * (max - min + 1)) + min;
    return `https://picsum.photos/id/${rand}/${width}/${height}`;
  }

  static nameField(value) {
    return {
      value: value,
      field: "name",
      label: "Name",
      min: 3,
      required: true
    };
  }
  static emailField(value) {
    return {
      value: value,
      field: "email",
      label: "Email",
      type: "email",
      required: true,
      min: 6,
      max: 128,
      rules: [Rules.email]
    };
  }
  static cityField(value) {
    return {
      value: value,
      field: "city",
      label: "City",
      required: true,
      min: 4,
      max: 64
    };
  }
  static addressField(value) {
    return {
      value: value,
      field: "address",
      label: "Addres",
      required: true,
      min: 4,
      max: 64,
      cols: 8,
    };
  }
  static zipField(value) {
    return {
      value: value,
      field: "zipcode",
      label: "Zip",
      required: true,
      min: 4,
      max: 8,
      cols: 4,
    };
  }
  static phoneField(value) {
    return {
      value: value,
      field: "phone",
      label: "Phone",
      type: "phone",
      required: true,
      rules: [Rules.len(10)]
    };
  }
  static descriptionField(value) {
    return {
      counter: true,
      value: value,
      field: "description",
      label: "Description",
    };
  }
}
