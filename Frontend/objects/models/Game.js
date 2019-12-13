import Model from './abstract/Model';
import Form from '../forms/abstract/Form';
import endpoints from '../../configs/endpoints';

export default class Game extends Model {
  constructor(data = {}) {
    super('games', data.id);



    this.slug = this.name.split(" ").join("-");
    this.courts = Math.floor(Math.random() * 5) + 1;
  }

  static createForm(entity) {
    let form = new Form(entity.id);
    return form;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.games;
    return id ? `${ endpoint }/${ id }` : endpoint;
  }
}
