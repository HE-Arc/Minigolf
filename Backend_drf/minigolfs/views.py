from rest_framework import viewsets

from minigolfs.models import Minigolf
from minigolfs.serializers import MinigolfSerializer

class MinigolfViewSet(viewsets.ModelViewSet):
    queryset = Minigolf.objects.all()
    serializer_class = MinigolfSerializer

