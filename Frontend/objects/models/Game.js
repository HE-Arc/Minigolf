import Model from './abstract/Model';
import endpoints from '../../configs/endpoints';

export default class Game extends Model {
  constructor(data = {}) {
    super('games', data.id);
    this.creator = data.creator;
    this.course = data.course;
    this.minigolf = data.minigolf;
    this.players = data.players;
    this.date = data.date;
    this.token = data.token;


    this.slug = this.name.split(" ").join("-");
  }

  // static createForm(entity) {
  //   let form = new Form(entity.id);
  //   return form;
  // }

  static endpoint(id = false) {
    let endpoint = endpoints.games;
    return id ? `${ endpoint }/${ id }` : endpoint;
  }
}
