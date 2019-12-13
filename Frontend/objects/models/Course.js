import Model from './abstract/Model';
import Form from '../forms/abstract/Form';
import endpoints from '../../configs/endpoints';

export default class Course extends Model {
  constructor(data = {}) {
    super('courses', data.id);
    this.name = data.name || "";
    this.description = data.description;
    this.image = data.image;



    this.slug = this.name.split(" ").join("-");
    this.courts = Math.floor(Math.random() * 5) + 1;
  }

  static createForm(entity) {
    let form = new Form(entity.id);
    form.createTextField(Model.nameField(entity.name));
    form.createTextArea(Model.descriptionField(entity.description));
    return form;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.courses;
    return id ? `${ endpoint }/${ id }` : endpoint;
  }
}
