import Model from './abstract/Model';
import Rules from '../forms/abstract/Rules';
import endpoints from '../../configs/endpoints';

export default class User extends Model {
  constructor(data = {}) {
    super('users', data.id);

    this.name = data.name;
    this.email = data.email;
  }

  initForm() {
    let name = this.form.createTextField({
      field: 'name',
      label: 'Name',
      min: 3,
      required: true,
    });
    let email = this.form.createTextField({
      field: 'email',
      label: 'Email',
      type: 'email',
      required: true,
      min: 4,
      max: 30,
      rules: [Rules.email],
    });

    console.log(this.form.fieldByName("email"))
  }

  static endpoint(id = false) {
    let endpoint = endpoints.users;
    return id ? `${ endpoint }/${ id }` : endpoint;
  }
}
