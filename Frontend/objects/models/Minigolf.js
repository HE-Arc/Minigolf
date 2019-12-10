import Model from './abstract/Model';
import Rules from '../forms/abstract/Rules';
import Form from '../forms/abstract/Form';
import endpoints from '../../configs/endpoints';

export default class Minigolf extends Model {
  constructor(data = {}) {
    super('minigolfs', data.id);
    this.name = data.name || "";
    this.city = data.city;
    this.address = data.address;
    this.long = data.long;
    this.lat = data.lat;
    this.zipcode = data.zipcode;
    this.phone = data.phone;
    this.email = data.email;
    this.description = data.description;
    this.image = data.image;



    this.slug = this.name.split(" ").join("-");
    // this.image = Model.getRandomImageUrl();
    this.courts = Math.floor(Math.random() * 5) + 1;
  }

  static createForm(entity) {
    let form = new Form(entity.id);
    form.createTextField(Model.nameField(entity.name));
    form.createTextField(Model.emailField(entity.email));
    form.createTextField(Model.cityField(entity.city));
    form.createTextField(Model.addressField(entity.address));
    form.createTextField(Model.zipField(entity.zipcode));
    form.createTextField(Model.phoneField(entity.phone));
    form.createTextArea(Model.descriptionField(entity.description));
    return form;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.minigolfs;
    return id ? `${ endpoint }/${ id }` : endpoint;
  }
}
