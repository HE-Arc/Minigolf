import Model from './abstract/Model';
import endpoints from '../../configs/endpoints';

export default class User extends Model {
  constructor(data = {}) {
    super("users", data.id);

    this.name = data.name;
    this.email = data.email;
  }

  initForm() {
    this.form.createTextField({field: "name", label: "Name", required: true});
    this.form.createTextField({field: "email", label: "Email", type: "email", min: 4, max: 30});
  }

  static endpoint(id = false) {
    let endpoint = endpoints.users;
    return id ? `${endpoint}/${id}` : endpoint;
  }
}
