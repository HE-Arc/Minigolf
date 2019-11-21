import endpoints from "../../configs/endpoints";

export default class User {
  constructor(data = {}) {
    this.id = data.id;
    this.name = data.name;
    this.email = data.email;

    this.storeName = "users"
  }

  static string() {
    return "User"
  }

  static endpoint(id = false) {
    let endpoint = endpoints.users;
    return id ? `${endpoint}/${id}` : endpoint;
  }
}
