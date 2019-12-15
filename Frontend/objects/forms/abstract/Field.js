import Rules from "./Rules";

class Field {
  constructor(attrs) {
    this.field = attrs.field;
    this.value = attrs.value || null;
    this.label = attrs.label || this.field;
    this.required = attrs.required ? Rules.req : null;

    this.clearable = attrs.clearable || null;
    this.hint = attrs.hint || null;
    this.placeholder = attrs.placeholder || null;
    this.focus = attrs.focus || false;

    this.cache = this.value;
    this.disabled = false;

    this.rules = attrs.rules || [];
  }

  isEmpty = () => this.value == null;
  isDirty = () => this.cache != this.value;

  isValid() {
    if (!this.value && this.required) {
      return false;
    }
    return this.rules.filter(r => typeof r(this.value) === "string") == 0;
  }
}

export class TextField extends Field {
  constructor(attrs) {
    super(attrs);
    this.fieldType = "TextField";
    this.counter = attrs.counter || null;
    this.type = attrs.type || null;
    this.icon = attrs.icon || null;

    this.max = attrs.max ? Rules.max(attrs.max) : null;
    this.min = attrs.min ? Rules.min(attrs.min) : null;
    this.length = attrs.length ? Rules.len(attrs.length) : null;
    this.initRules();

    this.cols = attrs.cols || 12;
  }

  initRules() {
    let rules = [this.required, this.max, this.min, this.length];
    this.rules = [...rules.filter(r => r != null), ...this.rules];
  }
}

export class TextArea extends TextField {
  constructor(attrs) {
    super(attrs);
    this.fieldType = "TextArea";
  }
}

export class CheckBox extends Field {
  constructor(attrs) {
    super(attrs);
    this.fieldType = "CheckBox";
  }
}

export class SelectList extends Field {
  constructor(attrs) {
    super(attrs);
    this.fieldType = "SelectList";
    this.items = attrs.items;
    this.many = attrs.many;
  }
}
