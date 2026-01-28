import axios from "axios";

function api(
  data = {
    method: "GET",
    url: "",
    body: null,
    data: null,
    callback,
    error,
    headers: { "Content-Type": "application/json" },
  }
) {
  axios({
    method: data.method,
    url: data.url,
    data: data.data,
    body: data.body,
    headers: data.headers,
  })
    .then(function (res) {
      data.callback(res.data);
    })
    .catch(function (error) {
      data.error(error);
    });
}

export default api;
