import endpoints from "../configs/endpoints";

export default class Contry {
  constructor(data = {}) {
    this.id = data.id;
    this.name = data.name;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.countries;
    return id ? `${endpoint}/${id}` : endpoint;
  }
}
