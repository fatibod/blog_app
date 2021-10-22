import 'package:http/http.dart' as http;

class Repository {
  String _baseUrl = 'http://192.168.1.75:8000/api/get-all-blog-posts';

  httpGet(String api) async {
    return await http.get(_baseUrl + "/" + api);
  }
}
