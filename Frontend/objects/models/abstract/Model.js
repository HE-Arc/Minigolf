import Form from '../../forms/abstract/Form';

export default class Model {
  constructor(storeName, id) {
    this.id = id;
    this.storeName = storeName;

    this.form = new Form();
  }

  initForm() { /* abstract */ }
}
