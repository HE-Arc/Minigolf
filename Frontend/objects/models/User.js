import Model from "./abstract/Model";
import Form from "../forms/abstract/Form";
import endpoints from "../../configs/endpoints";

export default class User extends Model {
  constructor(data = {}) {
    super("users", data.id);
    this.name = data.name;
    this.email = data.email;
    this.city = data.city;
    this.role = data.role;
    this.played = data.played;
    this.created = data.created;

  }

  static createForm(entity) {
    let form = new Form(entity.id);
    form.createTextField(this.nameField(entity.name));
    form.createTextField(this.emailField(entity.email));
    form.fieldByName("name").label = 'Displayed name';
    form.createTextField(this.cityField(entity.city));
    return form;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.users;
    return id ? `${endpoint}/${id}` : endpoint;
  }
}
