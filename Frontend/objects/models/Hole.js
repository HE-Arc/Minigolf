import Model from './abstract/Model';
import endpoints from '../../configs/endpoints';

let randint = (min, max) => Math.floor(Math.random() * (max - min + 1) + min);

export default class Hole extends Model {
  constructor(data = {}) {
    super('holes', data.id);
    this.number = data.number;

    this.best = data.best || randint(1, 3) ;
    this.worse = data.worse || randint(20, 40);
    this.average = data.average || randint(3, 20);
    this.median = data.median || randint(3, 10);
    this.count = data.count || randint(10, 1000);

    this.course = data.course;
  }

  static endpoint(id = false) {
    let endpoint = endpoints.holes;
    return id ? `${ endpoint }/${ id }` : endpoint;
  }
}
