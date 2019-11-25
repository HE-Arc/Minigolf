export default class Rules {
  static req = v => !!v || "Required";

  static min = n => v => (!v || v.length >= n) || `Minimum ${n} characters`;

  static max = n => v => (!v || v.length <= n) || `Maximum ${n} characters`;

  static len = n => v => (!v || v.length === n) || `${n} characters`;

  static email = v => /\S+@\S+\.\S+/.test(v) || "This address is not valid.";
}
