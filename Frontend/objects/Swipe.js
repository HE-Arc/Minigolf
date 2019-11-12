import endpoints from "../configs/endpoints";

export default class Swipe {
  constructor(data = {}) {
    this.id = data.id;
    this.distance = data.distance;
    // this.country = data.country;
    // this.city = data.city;
    this.created_at = data.created_at;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.swipes;
    return id ? `${endpoint}/${id}` : endpoint;
  }
}
