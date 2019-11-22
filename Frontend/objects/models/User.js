import Model from './abstract/Model';
import Rules from '../forms/abstract/Rules';
import endpoints from '../../configs/endpoints';
import Form from '../forms/abstract/Form';

export default class User extends Model {
  constructor(data = {}) {
    super('users', data.id);
    this.name = data.name;
    this.email = data.email;

    this.form = new Form();
    this.initForm();
  }

  initForm() {
    this.form.createTextField({
      value: this.name,
      field: 'name',
      label: 'Name',
      min: 3,
      required: true,
    });
    this.form.createTextField({
      value: this.email,
      field: 'email',
      label: 'Email',
      type: 'email',
      required: true,
      min: 4,
      max: 30,
      // rules: [Rules.email()],
    });
    this.form.createCheckBox({
      value: false,
      field: 'ready',
      label: 'Ready',
    });
    // this.form.createTextArea({
    //   value: this.email,
    //   field: 'description',
    //   label: 'Description',
    //   required: true,
    //   max: 15,
    //   min: 4,
    //   counter: true,
    // });
  }

  static endpoint(id = false) {
    let endpoint = endpoints.users;
    return id ? `${ endpoint }/${ id }` : endpoint;
  }
}
