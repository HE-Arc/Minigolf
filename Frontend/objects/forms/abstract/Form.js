import { CheckBox, SelectList, TextArea, TextField } from './Field';

export default class Form {
  constructor() {
    this.fields = [];
  }

  _filterBy = type => this.fields.filter(f => f instanceof type);

  fieldByName = name => this.fields.find(f => f.field == name);

  textFields = () => this._filterBy(TextField);
  textAreas = () => this._filterBy(TextArea);
  checkBoxes = () => this._filterBy(CheckBox);
  selectLists = () => this._filterBy(SelectList);

  isDirty = () => this.fields.filter(f => f.isDirty()).length > 0;
  isValid = () => this.fields.filter(f => !f.isValid()).length === 0;

  _createField(field) {
    this.fields.push(field);
    return field;
  }

  createTextField = attrs => this._createField(new TextField(attrs));
  createTextArea = attrs => this._createField(new TextArea(attrs));
  createCheckBox = attrs => this._createField(new CheckBox(attrs));
  createSelectList = attrs => this._createField(new SelectList(attrs));
}
