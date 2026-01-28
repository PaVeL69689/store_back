const useValidatePosts = (data = { email: "", password: "" }) => {
  let errors = [];

  switch (data.email.trim()) {
    case "":
      errors.push("Поле email должно быть заполнено");
      break;
  }
  switch (data.password.trim()) {
    case "":
      errors.push("Поле password должно быть заполнено");
      break;
  }
  return errors;
};

export default useValidatePosts;
