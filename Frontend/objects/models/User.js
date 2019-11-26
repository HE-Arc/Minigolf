import Model from './abstract/Model';
import Rules from '../forms/abstract/Rules';
import Form from '../forms/abstract/Form';
import endpoints from '../../configs/endpoints';

export default class User extends Model {
  constructor(data = {}) {
    super('users', data.id);
    this.name = data.name;
    this.email = data.email;
  }

  static createForm(user) {
    let form = new Form(user.id);
    form.createTextField({
      value: user.name,
      field: 'name',
      label: 'Name',
      min: 3,
      required: true,
    });
    form.createTextField({
      value: user.email,
      field: 'email',
      label: 'Email',
      type: 'email',
      required: true,
      min: 4,
      max: 30,
      rules: [Rules.email],
    });
    return form;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.users;
    return id ? `${ endpoint }/${ id }` : endpoint;
  }
}
