import endpoints from "../configs/endpoints";

export default class City {
  constructor(data = {}) {
    this.id = data.id;
    this.name = data.name;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.cities;
    return id ? `${endpoint}/${id}` : endpoint;
  }
}
