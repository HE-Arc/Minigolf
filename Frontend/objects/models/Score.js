import Model from "./abstract/Model";
import Form from "../forms/abstract/Form";
import endpoints from "../../configs/endpoints";

export default class Score extends Model {
  constructor(data = {}) {
    super("users", data.id);
    this.user = data.user;
    this.hole = data.hole;
    this.game = data.game;
    this.score = data.score;

  }

  // static createForm(entity) {
    // let form = new Form(entity.id);
    // return form;
  // }

  static endpoint(id = false) {
    let endpoint = endpoints.scores;
    return id ? `${endpoint}/${id}` : endpoint;
  }
}
