import Model from './abstract/Model';
import endpoints from '../../configs/endpoints';

let randint = (min, max) => Math.floor(Math.random() * (max - min + 1) + min);

export default class Hole extends Model {
  constructor(data = {}) {
    super('holes', data.id);
    this.number = data.number;

    this.best = data.best || 0;
    this.worse = data.worse || 0;
    this.average = data.average || 0;
    this.median = data.median || 0;
    this.count = data.count || 0;

    this.course = data.course;
    this.minigolf = data.minigolf;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.holes;
    return id ? `${ endpoint }/${ id }` : endpoint;
  }
}
